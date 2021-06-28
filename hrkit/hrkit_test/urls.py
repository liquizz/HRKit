from django.urls import include, path
from . import views

urlpatterns = [
    path('', views.index, name='index'),
    path('demo1/', views.demo1, name='demo1'),
    path('demo2/', views.demo2, name='demo2'),
    path('catalogue/', views.catalogue, name='catalogue'),
]