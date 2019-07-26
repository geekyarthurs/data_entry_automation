import requests
import csv
import sys

# s= requests.session()

def pushData(name,job):
    data = {'name' : name, 'job' : job}
    r = requests.post("http://localhost/index.php",data)
    if(r.status_code == 200):
        print("Updated Data :" + str(data))
    pass

if(len(sys.argv) == 1):
    print("Please provide the filename of csv file or  username and job.")
    exit()
elif(len(sys.argv) == 2):
    filename = sys.argv[1]
    print("Opening File: " + filename)
    with open(filename) as csv_file:
        csv_reader = csv.reader(csv_file, delimiter=',')
        line_count = 0
        for row in csv_reader:
            if line_count == 0:
                print(f'Column names are {", ".join(row)}')
                line_count += 1
            else:
                pushData(row[0],row[1])
        print(f'Processed {line_count} lines into the database')
elif(len(sys.argv) == 3):
    pushData(sys.argv[1],sys.argv[2])

else:
    print("Invalid Arguments Received")

    
    
