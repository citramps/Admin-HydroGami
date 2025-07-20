from locust import HttpUser, task, between

class NotifikasiUser(HttpUser):
    wait_time = between(3, 7)

    def on_start(self):
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
    def get_notifikasi(self):
        if self.token:
            self.client.get("/api/notifikasi", headers=self.headers)
