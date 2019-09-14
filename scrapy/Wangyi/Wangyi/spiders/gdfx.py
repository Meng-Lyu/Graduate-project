# -*- coding: utf-8 -*-
import scrapy
from Wangyi.items import WangyiItem


class GdfxSpider(scrapy.Spider):
    name = 'gdfx'
    allowed_domains = ['quotes.money.163.com']
    start_urls = ['http://quotes.money.163.com/']
    custom_settings = {
    'ITEM_PIPELINES':{'Wangyi.pipelines.Pipelinegdfx': 300}
    }

    def start_requests(self):
        f = open("urlList.csv", 'r')  #从csv文件中导入各个公司的代码
        urlList = f.readlines()
        for code in urlList:
            code = code.strip()
            try:
                url = 'http://quotes.money.163.com/f10/gdfx_' + code + '.html#01f01'
                yield scrapy.Request(url, callback=self.parse)
            except:
                continue

    def parse(self, response):
        info = response.xpath('//div[@id="dateTable"]/table')
        item = WangyiItem()
        infoList = response.xpath('//div[@class="area"]/div[@class="header"]/div[@class="stock_info"]/table')
        for p in range(len(infoList)):
            item['sim_name'] = infoList.xpath('.//tr/td//h1/a/text()').extract()
            item['code'] = infoList.xpath('.//tr/td//h1/span/a/text()').extract()

        for i in info:    
            item['shareholder_1'] = i.xpath('.//tr/td/text()').extract()[0]
            item['perc_1'] = i.xpath('.//tr/td/text()').extract()[1]
            item['shareholder_2'] = i.xpath('.//tr/td/text()').extract()[4]
            item['perc_2'] = i.xpath('.//tr/td/text()').extract()[5]
            item['shareholder_3'] = i.xpath('.//tr/td/text()').extract()[8]
            item['perc_3'] = i.xpath('.//tr/td/text()').extract()[9]
            item['shareholder_4'] = i.xpath('.//tr/td/text()').extract()[12]
            item['shareholder_5'] = i.xpath('.//tr/td/text()').extract()[16]
            item['shareholder_6'] = i.xpath('.//tr/td/text()').extract()[20]
            item['shareholder_7'] = i.xpath('.//tr/td/text()').extract()[24]
            item['shareholder_8'] = i.xpath('.//tr/td/text()').extract()[28]
            item['shareholder_9'] = i.xpath('.//tr/td/text()').extract()[32]
            item['shareholder_10'] = i.xpath('.//tr/td/text()').extract()[36]

            yield item

