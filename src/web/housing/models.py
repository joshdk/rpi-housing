from django.db import models

# Create your models here.
class Building(models.Model):
  name = models.CharField(max_length=60, unique=True)
  address = models.CharField(max_length=600)
  description = models.TextField(max_length=10000)

  def __unicode__(self): 
    return self.name
  #restriction ???

class Room(models.Model):
  GENDER_CHOICES = (
      (u'A', u'Any'),
      (u'M', u'Male'),
      (u'F', u'Female'),
      )
  number = models.CharField(max_length=20)
  building = models.ForeignKey(Building)
  gender = models.CharField(max_length=2, choices=GENDER_CHOICES)
  totalPeople = models.IntegerField()
  isActive = models.BooleanField(default = True)

  def __unicode__(self): 
    return self.building.__unicode__() + " " + self.number

class User(models.Model):
  GENDER_CHOICES = (
      (u'M', u'Male'),
      (u'F', u'Female'),
      )
  username = models.CharField(max_length=60, unique=True)
  gender = models.CharField(max_length=2, choices=GENDER_CHOICES)
  year = models.IntegerField()
  lottery = models.IntegerField(default = -1)
  isActive = models.BooleanField(default = True)
  dateCreated = models.DateField(auto_now_add=True)
  room = models.ForeignKey(Room, null=True, blank=True)
  canRegister = models.BooleanField(default = False)
  dateCanRegister = models.DateField(null=True,blank=True)

  def __unicode__(self): 
    return self.username

class Queue(models.Model):
  userMain = models.ForeignKey(User, related_name='queue_main')
  room = models.ForeignKey(Room)
  rank = models.IntegerField()
  userInvited = models.ManyToManyField(User, related_name='queue_invited')
  isValid = models.BooleanField()
  dateCreated = models.DateField(auto_now_add=True)

  def __unicode__(self): 
    return self.userMain.__unicode__() + " for " + self.room.__unicode__() 

class Invitation(models.Model):
  inviter = models.ForeignKey(User, related_name='invitation_inviter')
  userInvited = models.ForeignKey(User, related_name='invitation_inveted')
  queue = models.ForeignKey(Queue)
  confirmCode = models.CharField(max_length=60, unique=True)
  dateCreated = models.DateField(auto_now_add=True)

  def __unicode__(self):
    return self.inviter.__unicode__() + " " + dateCreated


#AdminUser covered by django.contrib.auth

#class AdminUser(models.Model):
  #username = models.CharField(max_length=60, unique=True)
  #password = models.CharField(max_length=60)
