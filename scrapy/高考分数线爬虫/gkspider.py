# -*- coding: utf-8 -*-
import requests
import pymysql
from lxml import etree

class GaoKaoSpider:
#html解码
    def get_html(self,url):
        headers = {'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36'}
        html = requests.get(url, headers=headers)
        html.encoding = 'utf-8'                          #用utf-8解码，防止中文为乱码
        return html.text

#获得所需信息
    def parse_page(self,html):
        selector = etree.HTML(html)
        info = selector.xpath('//div[2]/table/tr[@class="tbl2tbody"]')
        for i in info:
            loc = i.xpath('.//td/text()')[1]                   #loc为地域
            score = i.xpath('.//td/text()')[4]                 #分数线
        return loc,score

    def db_save(self,list):
        db = pymysql.connect(
            host='127.0.0.1',  # 数据库地址
            port=3306,  # 数据库端口
            db='gkpredict',  # 数据库名
            user='root',  # 数据库用户名
            passwd='55151001',  # 数据库密码
            charset='utf8',  # 编码方式
            use_unicode=True)

        cursor = db.cursor()
        cursor.execute(
            """insert into locline(loc,2018_1,2017_1,2016_1,2015_1,2014_1,2013_1,2012_1,2011_1,2010_1,2009_1,2008_1,2018_2,2017_2,2016_2,2015_2,2014_2,2013_2,2012_2,2011_2,2010_2,2009_2,2008_2)
            value (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)""",
            (list[0],list[1],list[2],list[3],list[4],list[5],list[6],list[7],list[8],list[9],list[10],list[11],list[12],list[13],list[14],list[15],list[16],list[17],list[18],list[19],list[20],list[21],list[22]))
        db.commit()


if __name__ == '__main__':
    spider = GaoKaoSpider()
    url0 = 'http://kaoshi.edu.sina.com.cn/college/scorelist?tab=batch&wl=2&local='

    for n in range(1,33):
        list = []
        url1 = url0 + str(n) + '&batch='             #给url加上32个所需的地域
        for a in range(11,13):
            url2 = url1 + str(a) + '&syear='          #给url加上2个所需的批次（一本/二本）
            for i in range(2018,2007,-1):
                url = url2 + str(i)                #给url加上11个所需的年份
                try:
                    html = spider.get_html(url)           #防止url为空
                    try:
                        loc,score = spider.parse_page(html)
                        list.append(score)                #将一共22个分数线加入list中
                    except:
                        list.append("--")                   #若分数线为空，替换为“--”
                except:
                    continue
        list.insert(0,loc)                             #将地域loc加入list的首部
        spider.db_save(list)
        print(loc + '存储成功！')





