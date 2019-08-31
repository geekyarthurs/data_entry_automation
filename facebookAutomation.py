from pynput.keyboard import Key, Controller
import time

keyboard = Controller()

#opening firefox
os.system("firefox facebook.com")
time.sleep(10)

while True:
#scrolling post
    keyboard.press('j')
    keyboard.release('j')
    time.sleep(1)
#liking post
    keyboard.press('l')
    keyboard.release('l')
    time.sleep(3)




