from sqlalchemy_serializer import SerializerMixin
from data.db_session import SqlAlchemyBase
import sqlalchemy
from sqlalchemy import orm


class Form(SqlAlchemyBase, SerializerMixin):
    """Класс таблицы 'курьер' в базе данных"""
    __tablename__ = 'form'

    form_id = sqlalchemy.Column(sqlalchemy.Integer,
                                   primary_key=True, autoincrement=True)
    grade = sqlalchemy.Column(sqlalchemy.Integer, nullable=False)
    letter = sqlalchemy.Column(sqlalchemy.String, nullable=False)
