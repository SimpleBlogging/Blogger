import requests
import sys
import json
import html2text

path = "./Blog-Posts/{0}/content.html".format(sys.argv[1])
html = open(path).read()

url = "http://api.meaningcloud.com/sentiment-2.1"

payload = "key=97f69c4208be095a78e3bb39aa9f2235&lang=en&url=https://raw.githubusercontent.com/Huddie/EconomyClass/master/Blog-Posts/1/content.html&doc=html"
headers = {'content-type': 'application/x-www-form-urlencoded'}

response = requests.request("POST", url, data=payload, headers=headers)

print(response.text)


# Text or Email stats on every push
