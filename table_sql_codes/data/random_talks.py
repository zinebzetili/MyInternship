import random
from datetime import datetime, timedelta

# Random data for talks table
talk_names = ["Introduction to Machine Learning", "Blockchain Technology", "The Future of Artificial Intelligence",
              "Cybersecurity Trends and Threats", "Career Planning and Development", "Entrepreneurship Opportunities",
              "Sustainability and Green Technologies", "Leadership Skills for the Workplace", "Innovation and Creativity",
              "Financial Planning and Investment Strategies"]

talk_descriptions = ["Join us for a deep dive into the world of machine learning, including supervised and unsupervised techniques.",
                     "Discover how blockchain technology is revolutionizing industries, from finance to supply chain management.",
                     "Explore the latest advancements and ethical considerations in the field of artificial intelligence.",
                     "Learn about common cybersecurity threats and how to protect yourself and your business.",
                     "Get practical advice and strategies for planning your career path and achieving your goals.",
                     "Hear from successful entrepreneurs and learn about the challenges and opportunities of starting a business.",
                     "Discover innovative solutions for environmental challenges and the growing field of sustainable technologies.",
                     "Gain valuable insights into effective leadership techniques and strategies for building high-performing teams.",
                     "Unlock your creativity and learn how to cultivate an innovative mindset in the workplace.",
                     "Get expert advice and insights on personal finance and investment strategies."]

locations = ["New York", "London", "Paris", "Tokyo", "Sydney", "Singapore", "Dubai", "Toronto", "Hong Kong", "Berlin"]

provider_ids = [1, 2, 3, 4, 5]  # assume 5 providers in the database

# Random data generation for 10 rows in the talks table
for i in range(10):
    talk_name = random.choice(talk_names)
    talk_description = random.choice(talk_descriptions)
    website_link = f"http://www.example.com/{i}"
    location = random.choice(locations)
    duration = random.randint(1, 3) * 60  # in minutes
    create_datetime = datetime.now() - timedelta(days=random.randint(1, 60), hours=random.randint(1, 24),
                                                  minutes=random.randint(1, 60))
    provider_id = random.choice(provider_ids)
    talk_date = create_datetime.date() + timedelta(days=random.randint(1, 30))  # talk date can be up to a month after create date
    print(f"INSERT INTO talks (name, description, website_link, location, duration, create_datetime, ID_provider, talk_date) VALUES "
          f"('{talk_name}', '{talk_description}', '{website_link}', '{location}', {duration}, '{create_datetime}', {provider_id}, '{talk_date}');")
