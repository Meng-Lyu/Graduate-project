import json
import re
import pandas as pd

if __name__ == '__main__':
    busList = []
    bus = ""
    with open("bus.json", encoding='utf-8') as f:
        for line in f:
            line = re.findall(r'[\u4e00-\u9fa5]+', line)
            line = " ".join(line)                   #换成字符串
            line = re.sub(r'\u5176\u4ed6',"",line)  #str.encode('unicode_escape')是一个宝藏，这块去“其他”
            line = re.sub(r'\u8865\u5145',"",line)  #去“补充”
            line = re.sub(r'\u4e1a\u52a1',"",line)  #去“业务”
            line = re.sub(r'\u5176\u4e2d',"",line)  #去“其中”
            bus = bus + line

    busList = bus.split()  #再转回list，头好大，python的类型转换真是个大坑

    busList = list(set(busList)) #去重

    name=['bus']
    busi = pd.DataFrame(columns=name,data=busList)#数据列名为bus
    busi.to_csv('bus.csv',encoding='utf-8')
