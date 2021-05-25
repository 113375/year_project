from sqlalchemy_serializer import SerializerMixin
from data.db_session import SqlAlchemyBase
import sqlalchemy
from sqlalchemy import orm


class Student(SqlAlchemyBase, SerializerMixin):
    """Класс таблицы 'курьер' в базе данных"""
    __tablename__ = 'student'

    student_id = sqlalchemy.Column(sqlalchemy.Integer,
                                   primary_key=True, autoincrement=True)

    card_id = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    name = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    surname = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    patronymic = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    form = sqlalchemy.Column(sqlalchemy.Integer, sqlalchemy.ForeignKey("form.form_id"), nullable=False)


