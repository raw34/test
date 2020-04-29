#! /usr/bin/env python3

import acm

ENDPOINT = "acm.aliyun.com:8080"
NAMESPACE = "******"
AK = "******"
SK = "******"

# get config
client = acm.ACMClient(ENDPOINT, NAMESPACE, AK, SK)

client.set_options(failover_base="acm/data")
client.set_options(snapshot_base="acm/snapshot")

# data_id = "com.alibaba.cloud.acm:sample-app.properties"
data_id = "test"
group = "DEFAULT_GROUP"
print(client.get(data_id, group))

# add watch
import time

while True :
    client.add_watcher(data_id, group, lambda x:print("config change detected: " + str(x)))
    time.sleep(5) # wait for config changes
