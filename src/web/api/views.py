from django.http import HttpResponse
from django.template.loader import get_template
from django.template import Context


def main(request):
	data='<h1>Main API page</h1>'
	return HttpResponse(data)
