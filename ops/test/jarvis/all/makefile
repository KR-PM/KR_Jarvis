# 啟動環境
up: down
	docker-compose -p jarvis up

# 關閉環境
down:
	docker-compose -p jarvis down

# 進入 container 的 bash
bash:
	docker-compose -p jarvis exec ${t} bash

# 重新 build 環境
build:
	docker-compose -p jarvis build

logs:
	docker-compose -p jarvis logs -f
