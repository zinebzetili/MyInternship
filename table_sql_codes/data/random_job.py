import random
import datetime

positions = ["Software Engineer", "Data Scientist", "Product Manager", "Marketing Manager", "Sales Representative"]
companies = ["Google", "Facebook", "Amazon", "Microsoft", "Apple"]

for i in range(10):
    title = f"{random.choice(positions)} Job"
    description = f"This is a {title} position at {random.choice(companies)}."
    website_link = f"http://www.{random.choice(companies).lower()}.com/careers"
    location = f"{random.choice(['San Francisco', 'Seattle', 'New York', 'Los Angeles', 'Chicago'])}, USA"
    duration = random.randint(3, 12)
    start_date = datetime.date(2023, random.randint(1, 12), random.randint(1, 28))
    end_date = start_date + datetime.timedelta(days=30 * duration)
    position = random.choice(positions)
    company_name = random.choice(companies)
    create_datetime = datetime.datetime.now().strftime("%Y-%m-%d %H:%M:%S")
    id_provider = "NULL"
    
    print(f"INSERT INTO jobs_part (title, description, website_link, location, duration, start_date, end_date, position, company_name, create_datetime, ID_provider) VALUES ('{title}', '{description}', '{website_link}', '{location}', {duration}, '{start_date}', '{end_date}', '{position}', '{company_name}', '{create_datetime}', {id_provider});")
