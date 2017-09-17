#!/bin/bash
docker run -p 19000:9000 -e MINIO_REGION=us-east-1 -e MINIO_ACCESS_KEY=FWNV0XYHBELUDZJ03UE9 -e MINIO_SECRET_KEY=wWX8NyJ/e8n0ZvWq6ohVrCSJVcQL4rAmMxZqyMsr --name minio -d minio/minio server /export
mc config host add minio http://localhost:19000 FWNV0XYHBELUDZJ03UE9 wWX8NyJ/e8n0ZvWq6ohVrCSJVcQL4rAmMxZqyMsr
mc mb minio/testbucket
