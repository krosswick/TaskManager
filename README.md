# FinalProject
#### by Ryan Rottmann, Kyle Rosswick, and Perry Smith


This project is designed to put file types into a table and automatically detect what file type it is.  Upon detection, this application will sort the items based off of type. You can give each file name a customised title and description.  This will make organizing your documents easy and give you a new way to keep track of them!

# Schema

#### Table: ***storage***

|id|fileName|fileType|title|description|addDate|
|:-|:-------|:-------|:----|:----------|:------|
|1|Music|mp3|Jimi Hendrix|Purple Haze|2018-05-04 15:00:00|
|2|Notes|docx|CS3380|Markdown Paper|2018-05-04 15:01:00|
|3|HW|docx|CS2050|Final Project|2018-05-04 15:02:30|
|4|Pics|jpeg|Funny|Memes|2018-05-04 15:05:00|
|5|Movies|mov|StarWars|This is a movie about...|2018-05-04 16:03:17|


#### Table: ***user***

|id|loginID|password|firstName|lastName|
|:-|:------|:-------|:--------|--------|
|1|test|aiulfh08awfuisjn0w9$zsg^sdg!zxfa...|Kyle|Rosswick|


# Entity Relationship Diagram (ERD):
![Figure 1](https://github.com/krosswick/TaskManager/blob/master/Software_Design%20(1).png "Figure 1")

# CRUD

#### Creates:
Records

#### Reads:
Files, user

#### Updates:
by editing information

#### Deletes:
by deleting information

# Link to demonstration video:
