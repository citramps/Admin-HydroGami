from locust import HttpUser, task, between

class UserInfoTest(HttpUser):
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
    def get_user_info(self):
        self.client.get("/api/user", headers=self.headers)
