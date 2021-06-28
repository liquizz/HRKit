from django.shortcuts import render

# Create your views here.

def index(request):
	return render(request, 'index.html')

def demo1(request):
	return render(request, 'demo1.html')

def demo2(request):
	return render(request, 'demo2.html')

def catalogue(request):
	return render(request, 'catalogue.html')