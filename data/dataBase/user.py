from sqlalchemy_serializer import SerializerMixin
from data.db_session import SqlAlchemyBase
import sqlalchemy
from sqlalchemy import orm


class Student(SqlAlchemyBase, SerializerMixin):
    """Класс таблицы 'курьер' в базе данных"""
    __tablename__ = 'user'

    student_id = sqlalchemy.Column(sqlalchemy.Integer,
                                   primary_key=True, autoincrement=True)

    card_id = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    name = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    surname = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    second_name = sqlalchemy.Column(sqlalchemy.String, nullable=False)
    grade = sqlalchemy.Column(sqlalchemy.Integer, nullable=False)
    letter = sqlalchemy.Column(sqlalchemy.String, nullable=False)
