#! /usr/bin/env python3

import redis

rc = redis.Redis(host='127.0.0.1', port=6379)

ps = rc.pubsub()

ps.subscribe(['foo', 'bar'])

for item in ps.listen():

    if item['type'] == 'message':

        print item['data']
