# -*- coding: utf-8 -*-
import scrapy


class BusiSpider(scrapy.Spider):
    name = 'busi'
    allowed_domains = ['quotes.money.163.com']
    start_urls = ['http://quotes.money.163.com/']

    def start_requests(self):
        f = open("urlList.csv", 'r')  #从csv文件中导入各个公司的代码
        urlList = f.readlines()
        for code in urlList:
            code = code.strip()
            try:
                url = 'http://quotes.money.163.com/f10/gszl_' + code + '.html#01f01'
                yield scrapy.Request(url, callback=self.parse)
            except:
                continue

    def parse(self, response):
        headers = {'User-Agent':'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/73.0.3683.86 Safari/537.36'}

        busDict = {}
        info = response.xpath('//div[2]/div[9]/div[1]/table')
        for i in info:
            try:
                busDict['bus'] = i.xpath('.//tr/td[@class="align_l"]/text()').extract()
            except:
                break

        yield busDict

        return busDict
