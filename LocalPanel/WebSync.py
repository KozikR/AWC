#!/usr/bin/python3.4
import requests
import uuid
import json
import pprint
#from WinCrypt import crypt #only for Windows, Linux: import crypt
import crypt
"""
GetData:
Send and receive data from webpage.
Config:
URL - webpage url
PASSWORD - password, the same as in PHP app
Tutorials:
http://docs.python-requests.org/en/latest/user/quickstart/#more-complicated-post-requests
"""


class WebSync:
    def __init__(self, url, password):
    # Constans, make it as a parameters of constructor!
        self.URL = url  # "http://127.0.0.1/awc/api"
        self.PASSWORD = password  # "inGQIJdFm?pE2&V8z#Pq@M=gH@c$Fw"    #password, the same as in WebApp

    def createHeader(self):
        salt = uuid.uuid4().hex  # Should be random
        return {"Ask[Salt]": salt, "Ask[Pass]": crypt.crypt(self.PASSWORD, salt)}

    def sendRequest(self,payload):
        return requests.post(self.URL, data=payload)

    def getData(self):
        payload = self.createHeader()
        payload.update({"Ask[Query]": "Get"})
        return json.loads(self.sendRequest(payload).text)

    def addStatus(self, temp, water_consumption, watering, error_message):
        payload = self.createHeader()
        prefix = "State[State]"
        payload.update({"Ask[Query]": "AddState",
                        prefix+"[temp]": temp,
                        prefix+"[water_consumption]": water_consumption,
                        prefix+"[watering]": watering,
                        prefix+"[error]": error_message})
        return self.sendRequest(payload).text

    def addHumidity(self, flower_id, humidity):
        payload = self.createHeader()
        prefix = "Humidity[Humidity]"
        payload.update({"Ask[Query]": "AddHumidity",
                        prefix+"[flower_id]": flower_id,
                        prefix+"[humidity]": humidity})
        return self.sendRequest(payload).text

    def addPast_watering(self, flower_id, volume):
        payload = self.createHeader()
        prefix = "Past_watering[Past_watering]"
        payload.update({"Ask[Query]": "addPast_watering",
                        prefix+"[flower_id]": flower_id,
                        prefix+"[volume]": volume})
        return self.sendRequest(payload).text

if __name__ == "__main__":
    nSync = WebSync("http://10.0.0.67/awc/api","inGQIJdFm?pE2&V8z#Pq@M=gH@c$Fw")
    r  = nSync.getData()
    print(type(r))
    pp = pprint.PrettyPrinter(indent=4)
    pp.pprint(r)
    for member in r:
        print(member['Flower']['name'])