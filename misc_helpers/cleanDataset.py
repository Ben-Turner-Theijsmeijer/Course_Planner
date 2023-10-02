import requests

training_data = requests.get('https://datasets-server.huggingface.co/rows?dataset=dair-ai%2Femotion&config=split&split=train&offset=0')

for row in training_data.json()['rows']:
    print(row['row'])