from django.http import HttpResponse
from django.template.loader import get_template
from django.template import Context


def static(request,path):
	path='./'+path
	fd=open(path,'r')
	data=fd.read()
	fd.close()
	if path.endswith(".css"):
		return HttpResponse(data,mimetype="text/css charset=utf-8")
	elif path.endswith(".js"):
		return HttpResponse(data,mimetype="application/javascript charset=utf-8")
	else:
		return HttpResponse(data)
