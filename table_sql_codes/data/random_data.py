import random
import datetime

# generate a list of possible titles
titles = ["Marketing Intern", "Software Development Intern", "Finance Intern", "Graphic Design Intern"]

# generate a list of possible locations
locations = ["Algiers", "Oran", "Constantine", "Annaba", "Setif"]

# generate 10 rows of random data with ID_provider as NULL
for i in range(10):
    ID_internship = random.randint(1, 100)
    title = random.choice(titles)
    description = "This is a description for internship ID {}".format(ID_internship)
    website_link = "https://example.com/internship-{}".format(ID_internship)
    location = random.choice(locations)
    duration = random.randint(1, 6)
    start_date = datetime.date(2023, random.randint(1, 12), random.randint(1, 28))
    end_date = start_date + datetime.timedelta(days=duration*30)
    salary = random.randint(5000, 15000)
    create_datetime = datetime.datetime.now()
    ID_provider = 'NULL'
    
    # format the data as an SQL insert statement
    values = (ID_internship, title, description, website_link, location, duration, start_date, end_date, salary, create_datetime, ID_provider)
    sql = "INSERT INTO internship (ID_internship, title, description, website_link, location, duration, start_date, end_date, salary, create_datetime, ID_provider) VALUES ({}, '{}', '{}', '{}', '{}', {}, '{}', '{}', {}, '{}', {});".format(*values)
    
    # print out the SQL statement
    print(sql)
