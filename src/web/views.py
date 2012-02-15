from django.http import HttpResponse
from django.template.loader import get_template
from django.template import Context


def static(request,path):
	path='./'+path
	fd=open(path,'r')
	data=fd.read()
	fd.close()
	return HttpResponse(data)
