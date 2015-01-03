from datetime import datetime
import time
from WebSync import WebSync
from PLCSync import PLCSync

###############################
URL = "http://10.0.0.67/awc/api"
PASSWORD = "inGQIJdFm?pE2&V8z#Pq@M=gH@c$Fw"
COM = '/dev/ttyS1'
###############################


class Sync:
    week = ('Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday')
    def __init__(self, url, password, com):
        self.PLC = PLCSync(com)
        self.web = WebSync(url, password)
        self.configuration = []      # local copy of configuration from web server
        self.updateConfiguration()

        self.lastWaterign = datetime.now()

        self.volume = 10    # water volume, not implemented yet

    def updateConfiguration(self):
        self.configuration = self.web.getData()

    def updateHumidity(self):
        for flower in self.configuration:
            if __name__ == "__main__":
                print(flower['Flower']['name'])
            humidity = self.PLC.getHumidity(int(flower['Flower']['PLC_id']), int(flower['Flower']['Slot_id']))
            if __name__ == "__main__":
                print(humidity)
            self.web.addHumidity(flower['Flower']['id'], humidity)
            flower['humidity'][0]['humidity'] = humidity   # update local conf, non sync with web!

    def water(self, flower, volume):
        self.PLC.water(int(flower['PLC_id']), int(flower['Slot_id']), self.volume)
        self.web.addPast_watering(flower['id'], self.volume)

    def waterAll(self):
        currentWatering = datetime.now()
        for flower in self.configuration:
            if flower['Flower']['type'] == 'H':
                if int(flower['humidity'][0]['humidity']) < int(flower['Flower']['humidity_watering']):
                    self.water(flower['Flower'], self.volume)
            else:  # type == 'T'
                for schedule in flower['watering_time']:
                    scheduleWatering = False
                    time = list(map(int, schedule['time'].split(":")))
                    if schedule[Sync.week[self.lastWaterign.weekday()]]:
                        scheduleWatering = self.lastWaterign.replace(hour=time[0], minute=time[1], second = time[2])
                        if self.lastWaterign <= scheduleWatering and scheduleWatering <= currentWatering:
                            self.water(flower['Flower'], self.volume)
                    elif schedule[Sync.week[currentWatering.weekday()]]:
                        scheduleWatering = currentWatering.replace(hour=time[0], minute=time[1], second = time[2])
                        if self.lastWaterign <= scheduleWatering and scheduleWatering <= currentWatering:
                            self.water(flower['Flower'], self.volume)
        self.lastWaterign = currentWatering


if __name__ == "__main__":
    sync = Sync(URL, PASSWORD, COM)
    while True:
        time.sleep(5*60)
        print('Next update')
        sync.updateConfiguration()
        sync.updateHumidity()
        sync.waterAll()
    # sync.updateHumidity()