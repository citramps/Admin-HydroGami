from locust import HttpUser, task, between

class AuthUser(HttpUser):
    wait_time = between(3, 7)  

    def on_start(self):
        
        self.email = "prima@gmail.com"
        self.password = "123456"

    @task
    def login(self):
        self.client.post("/api/auth/login", json={
            "email": self.email,
            "password": self.password
        })
