import requests
import uuid
from WinCrypt import crypt #only for Windows, Linux: import crypt

"""
GetData:
Send and receive data from webpage.
Config:
URL - webpage url
PASSWORD - password, the same as in PHP app
Tutorials:
http://docs.python-requests.org/en/latest/user/quickstart/#more-complicated-post-requests
"""

class Sync:
    def __init__(self):
        # Constans
        self.URL = "http://127.0.0.1/awc/api"
        self.PASSWORD = "inGQIJdFm?pE2&V8z#Pq@M=gH@c$Fw"    #password, the same as in WebApp

    def createHeader(self):
        salt = uuid.uuid4().hex  #Should be random
        return {"Ask[Salt]": salt, "Ask[Pass]": crypt(self.PASSWORD, salt)}

    def sendRequest(self,payload):
        return requests.post(self.URL, data=payload)

    def getData(self):
        payload = self.createHeader()
        payload.update({"Ask[Query]": "Get"})
        return self.sendRequest(payload).text

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
    nSync = Sync()
    print(nSync.addPast_watering(2,34))
