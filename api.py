import flask
from data.dataBase.form import Form
from data.dataBase.student import Student
from data import db_session
from flask import request
from flask import jsonify

# TODO надо будет сделать обработчики /find_student


blueprint = flask.Blueprint(
    'news_api',
    __name__,
    template_folder='templates'
)


@blueprint.route('/check', methods=['POST'])
def check():
    # проверка ученика
    if not request.json:
        return jsonify({"error": "Пустой запрос"})
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
    keys = ["name", "surname", "second_name", "grade", "card_id", "letter"]
    if not all([i in data for i in keys]):
        return jsonify({"error": "Не все ключи на месте ('name', 'surname', 'second_name', 'card_id', 'grade', "
                                 "'letter')"})
    db_sess = db_session.create_session()
    # TODO сделать добавление
    form = db_sess.query(Form).filter(Form.grade == data["grade"]).filter(Form.letter == data["letter"]).first()
    if form is None:
        return jsonify({"error": "Несущестующий класс"})
    student = Student(card_id=data["card_id"], name=data["name"], surname=data["surname"],
                      second_name=data["second_name"], form=form.form_id)

    if db_sess.query(Student).filter(student.card_id == Student.card_id).first() is not None:
        return jsonify({"error": "Такой ученик уже есть"})
    db_sess.add(student)
    db_sess.commit()
    st = db_sess.query(Student).filter(student.card_id == Student.card_id).first()
    return jsonify({"id": st.student_id, "error": ""})


@blueprint.route("/find_student", methods=['GET'])
def find_student():
    pass


@blueprint.route("/students/<student_id>", methods=['PATCH'])
def patch_student(student_id):
    pass


@blueprint.route('/')
def main():
    return "<p>Сервер успешно работает</p>"
