import requests
import sys
import json

url = "http://api.meaningcloud.com/sentiment-2.1"

payload = "key=97f69c4208be095a78e3bb39aa9f2235&lang=en&url=https://raw.githubusercontent.com/Huddie/EconomyClass/master/Blog-Posts/1/content.html&doc=html"
headers = {'content-type': 'application/x-www-form-urlencoded'}

response = requests.request("POST", url, data=payload, headers=headers)

jsonData = json.loads(response.text)

subjectivity = NULL
irony = NULL

if(jsonData["status"]["msg"] == "OK"):
    subjectivity = jsonData["subjectivity"]
    irony = jsonData["irony"]



# Text or Email stats on every push
