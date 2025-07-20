from locust import HttpUser, task, between

class GamifikasiTest(HttpUser):
    wait_time = between(3, 7)

    def on_start(self):
        response = self.client.post("/api/auth/login", json={
            "email": "prima@gmail.com",
            "password": "123456"
        })

        if response.status_code == 200:
            token = response.json().get("token")
            self.headers = {
                "Authorization": f"Bearer {token}",
                "Accept": "application/json"
            }
        else:
            self.headers = {}

    @task
    def get_gamifikasi(self):
        self.client.get("/api/gamification", headers=self.headers)
