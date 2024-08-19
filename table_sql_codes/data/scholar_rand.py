import random
from datetime import datetime, timedelta

titles = ["Scholarship 1", "Scholarship 2", "Scholarship 3", "Scholarship 4", "Scholarship 5"]
descriptions = ["Description 1", "Description 2", "Description 3", "Description 4", "Description 5"]
locations = ["Location 1", "Location 2", "Location 3", "Location 4", "Location 5"]
start_date = datetime.now()
end_date = start_date + timedelta(days=30)

for i in range(10):
    title = random.choice(titles)
    description = random.choice(descriptions)
    website_link = "http://www.scholarship{}.com".format(i+1)
    location = random.choice(locations)
    duration = random.randint(1, 12)
    start_date = start_date + timedelta(days=30)
    end_date = end_date + timedelta(days=30)
    type = random.choice(["Fully Funded", "Partially Funded"])
    create_datetime = datetime.now().strftime('%Y-%m-%d %H:%M:%S')
    query = "INSERT INTO scholarships (title, description, website_link, location, duration, start_date, end_date, type, create_datetime, ID_provider) VALUES ('{}', '{}', '{}', '{}', {}, '{}', '{}', '{}', '{}', NULL);".format(title, description, website_link, location, duration, start_date.strftime('%Y-%m-%d'), end_date.strftime('%Y-%m-%d'), type, create_datetime)
    print(query)
