#!/usr/bin/python3.4

import serial

class PLCSync:
    ser = 0
    def __init__(self, com):
        self.ser = serial.Serial(com, 9600, parity=serial.PARITY_EVEN)

    def __del__(self):
        if self.ser != 0:
            self.ser.close()
            self.ser = 0

    def send(self, data):
        self.ser.write(data)

    def receive(self, length):
        return self.ser.read(length)

    def water(self, PLC_id, slot_id, volume):
        #1 - number of command
        data = chr(1).encode('latin_1')+chr(PLC_id).encode('latin_1')+chr(slot_id).encode('latin_1')+chr(volume).encode('latin_1')
        self.send(data)
        return int.from_bytes(self.ser.read(1), byteorder='big')

    def getHumidity(self, PLC_id, slot_id):
        #2 - number of command
        data = chr(2).encode('latin_1')+chr(PLC_id).encode('latin_1')+chr(slot_id).encode('latin_1')+chr(30).encode('latin_1')
        self.send(data)
        return int.from_bytes(self.ser.read(1), byteorder='big')

    def getError(self):
        #4 - number of function
        data = chr(4).encode('latin_1')+chr(30).encode('latin_1')+chr(30).encode('latin_1')+chr(30).encode('latin_1')
        self.send(data)
        return self.receive(4)


if __name__ == "__main__":
    nPLCSync = PLCSync("/dev/ttyS1")
    #print(nPLCSync.water(3, 0, 45))
    #print(nPLCSync.getHumidity(3,0))
