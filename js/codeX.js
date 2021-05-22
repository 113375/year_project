I2C1.setup({sda: SDA, scl: SCL, bitrate: 400000});

var nfc = require('nfc').connect({i2c: I2C1, irqPin: P10});
var led = require('led').connect(P7).turnOff();
var button = require('button').connect(P0);
var sum = [[]];
var num = 0;
var fall = 0;

nfc.wakeUp(function (error) {
    if (error) {
        print('NFC wake up error', error);
    } else {
        print('NFC wake up OK');
    }
});


function Recording() {
    print('Recording');
    nfc.listen();
    nfc.on('tag', function (error, data) {
        if (!error) {
            led.blink(1);
            print('Recorded');
            sum.push(data.uid);
            num++;
        }

        setTimeout(function () {
            nfc.listen();
        }, 1000);
    });

}


function Check() {
    print('Check');
    nfc.listen();
    nfc.on('tag', function (error, data) {
        if (!error) {
            print(data.uid);
            factoryLedLight(data.uid);
        }
        setTimeout(function () {
            nfc.listen();
        }, 1000);
    });

    function comparisonOfUid(uid, card) {
        var leng = uid.length;
        for (var i = 0; i < leng; i++) {
            if (uid[i] != card[i]) {
                return false;
            }
            if (i == uid.length - 1) {
                return true;
            }
        }
    }

    function factoryLedLight(id) {
        for (var i = 0; i < num; i++) {
            if (comparisonOfUid(id, sum[i])) {
                led.blink(3);
            } else {
                fall++;
            }
        }
        if (num == fall) {
            print('No');
        }
        fall = 0;
    }

}


button.on('click', Check);
button.on('hold', Recording);