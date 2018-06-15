from __future__ import print_function
from datetime import date, datetime, timedelta
import onionGpio
import time
import mysql.connector

def send( int ):
    cnx = mysql.connector.connect(user='oni', password='2470C0C06DEE42FD1618BB99005ADCA2EC9D1E19', host='192.168.3.10', database='mydb')
    cnx.close()

    print("Orderd")
    return

gpioNum1 = 3
gpioNum2 = 7
button1 = onionGpio.OnionGpio(gpioNum1)
button2 = onionGpio.OnionGpio(gpioNum2)
status1 = button1.setInputDirection()
status2 = button2.setInputDirection()

loop = 1
value1 = 0
value2 = 0
temp = 0

while loop == 1:
    temp = temp + 1
    value1 += int(button1.getValue())
    value2 += int(button2.getValue())
    print("-----------------------------------------------")
    print('GPIO' + str(gpioNum1) + 'input value: ' + str(value1))
    print('GPIO' + str(gpioNum2) + 'input value: ' + str(value2))
    if (value1 == 2):
        send(1)
    if (value2 == 2):
        send(2)
    if (temp == 3):
        value1 = 0; value2 = 0; temp = 0;
    time.sleep(3)

