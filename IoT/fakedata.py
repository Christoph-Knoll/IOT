
from __future__ import print_function
from datetime import date, datetime, timedelta
import mysql.connector

print("<Input Product to add>: ")
prod = input()

cnx = mysql.connector.connect(user='root', database='mydb')
cursor = cnx.cursor()

add_order = ("INSERT INTO Orders "
               "(Nr, Date) "
               "VALUES (%s, %s)")

data_order = (prod, datetime.now())

# Insert new order
cursor.execute(add_order, data_order)
emp_no = cursor.lastrowid

# Make sure data is committed to the database
cnx.commit()

cursor.close()
cnx.close()
