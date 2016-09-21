#!/usr/bin/python
import sys
import Adafruit_DHT
import time
import pymongo
from datetime import datetime


def main():
  db = connectMongo()
  while True:
    dto = datetime.now()
    dto = datetime.strftime(dto, "%Y-%m-%d %H:%M:%S")
    
    humidity, temperature = Adafruit_DHT.read_retry(11, 4)
  
    hums = db.hum
    temps= db.temp

    hum_dict = {'time': dto, 'val': humidity }
    temp_dict = {'time': dto, 'val': temperature }
  
    hums.insert_one(hum_dict)
    temps.insert_one(temp_dict)

    time.sleep(300)

def connectMongo():
  connection = pymongo.MongoClient("mongodb://admin:admin@ds019926.mlab.com:19926/qpdemo")
  db = connection.qpdemo
  return db

if __name__ == "__main__":
  main()
