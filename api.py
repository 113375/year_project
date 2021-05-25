import flask
from data.dataBase.form import Form
from data.dataBase.student import Student
from data import db_session
from flask import request, render_template
from flask import jsonify
import sqlite3

blueprint = flask.Blueprint(
    'news_api',
    __name__,
    template_folder='templates'
)


@blueprint.route('/check', methods=['POST'])
def check():
    # проверка ученика
    if not request.json:
        return jsonify({"error": "Пустой запрос", "access": "false"})
    data = request.json
    db_sess = db_session.create_session()
    res = db_sess.query(Student).filter(data["card_id"] == Student.card_id).first()
    if res is not None:
        return jsonify({"access": "true", "student_id": res.student_id, "error": ""})
    return jsonify({"access": "false", "error": "Несуществующий id карты"})


@blueprint.route('/add_student', methods=['POST'])
def add_student():
    if not request.json:
        return jsonify({"error": "Пустой запрос"})
    data = request.json
    keys = ["name", "surname", "patronymic", "grade", "card_id", "letter"]
    if not all([i in data for i in keys]):
        return jsonify({"error": "Не все ключи на месте ('name', 'surname', 'patronymic', 'card_id', 'grade', "
                                 "'letter')"})
    db_sess = db_session.create_session()
    form = db_sess.query(Form).filter(Form.grade == data["grade"]).filter(Form.letter == data["letter"]).first()
    if form is None:
        return jsonify({"error": "Несущестующий класс"})
    student = Student(card_id=data["card_id"], name=data["name"], surname=data["surname"],
                      patronymic=data["patronymic"], form=form.form_id)

    if db_sess.query(Student).filter(student.card_id == Student.card_id).first() is not None:
        return jsonify({"error": "Такой ученик уже есть"})
    db_sess.add(student)
    db_sess.commit()
    st = db_sess.query(Student).filter(student.card_id == Student.card_id).first()
    return jsonify({"id": st.student_id, "error": ""})


@blueprint.route("/get_student/<card_id>", methods=['GET'])
def find_student(card_id):
    db_sess = db_session.create_session()
    student = db_sess.query(Student).filter(Student.card_id == card_id).first()
    if not student:
        return jsonify({"error": "Несуществующий ученик"})
    form = db_sess.query(Form).filter(Form.form_id == student.form).first()
    return jsonify({"card_id": card_id,
                    "student": {"name": student.name,
                                "surname": student.surname,
                                "patronymic": student.patronymic,
                                "form": form.grade,
                                "letter": form.letter,
                                "form_id": form.form_id
                                }})


@blueprint.route("/students/<student_id>", methods=['PATCH'])
def patch_student(student_id):
    if not request.json:
        return jsonify({"error": "Пустой запрос"})
    data = request.json
    db_sess = db_session.create_session()
    student = db_sess.query(Student).filter(Student.student_id == student_id).first()
    if "name" in data:
        student.name = data["name"]
    if "surname" in data:
        student.surname = data["surname"]
    if "patronymic" in data:
        student.patronymic = data["patronymic"]
    if "card_id" in data:
        student.card_id = data["card_id"]
    if "grade" and "letter" in data:
        form = db_sess.query(Form).filter(Form.grade == data["grade"]).filter(Form.letter == data["letter"]).first()
        if form:
            student.form = form.form_id
        else:
            return jsonify({"error": "Несуществующий класс"})
    db_sess.commit()
    student2 = db_sess.query(Student).filter(Student.student_id == student_id).first()
    form = db_sess.query(Form).filter(Form.form_id == student2.form).first()

    return jsonify({"student": {"name": student2.name,
                                "surname": student2.surname,
                                "patronymic": student2.patronymic,
                                "form": form.grade,
                                "letter": form.letter,
                                "form_id": form.form_id
                                }})


@blueprint.route('/')
def main():
    return render_template('makeSql.html', answer="Введите запрос")


@blueprint.route('/', methods=["POST"])
def mainPost():
    sql = request.form['sql']
    con = sqlite3.connect("db/school.db")
    cur = con.cursor()
    try:
        answer = cur.execute(sql).fetchall()
        if not answer:
            answer = "В базе данных пока ничего нет"
    except Exception as e:
        answer = str(e)
    return render_template('makeSql.html', answer=answer)
