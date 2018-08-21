import sys
import os
import atd
import html2text
import itertools

path = "./Blog-Posts/{0}/content.html".format(sys.argv[1])
html = open(path).read()

h2tHandler = html2text.HTML2Text()

text = h2tHandler.handle(html)

atd.setDefaultKey("eadler-422oapjffj")
metrics = atd.stats(text)
print([str(m) for m in metrics])

errors = atd.checkDocument("Looking too the water. Fixing your writing typoss.")
print(errors)
for error in errors:
  for item in error:
    print(item)
	# print("%s error for: %s **%s**" % (error.type, error.precontext, error.string))
	# print("some suggestions: %s" % (", ".join(error.suggestions),))






