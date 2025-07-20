from locust import HttpUser, task, between
import json

class SensorDataUser(HttpUser):
    wait_time = between(1, 5) 
    def on_start(self):
        # Login dulu buat dapetin Bearer token
        response = self.client.post("/api/auth/login", json={
            "email": "prima@gmail.com",     
            "password": "123456"         
        })

        if response.status_code == 200:
            self.token = response.json().get("token")
            self.headers = {
                "Authorization": f"Bearer {self.token}",
                "Accept": "application/json"
            }
        else:
            self.token = None
            self.headers = {}

    @task
    def get_sensor_data(self):
        # Endpoint yang dites: GET /sensor-data
        self.client.get("/api/sensor-data", headers=self.headers)
