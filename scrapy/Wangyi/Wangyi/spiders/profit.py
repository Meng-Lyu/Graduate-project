# -*- coding: utf-8 -*-
import scrapy
from Wangyi.items import WangyiItem

class ProfitSpider(scrapy.Spider):
    name = 'profit'
    allowed_domains = ['quote.eastmoney.com']
    start_urls = ['http://quote.eastmoney.com/']
    custom_settings = {
    'ITEM_PIPELINES':{'Wangyi.pipelines.Pipelineprofit': 300}
    }

    def start_requests(self):
        f = open("urlList.csv", 'r')                           #从csv文件中导入各个公司的代码
        urlList = f.readlines()
        for code in urlList:
            code = code.strip()
            try:
                url = 'http://quote.eastmoney.com/sz' + code + '.html'                       #爬深圳还是上海的公司记得改这里！！！！！
                yield scrapy.Request(url, callback=self.parse)
            except:
                continue

    def parse(self, response):
        info = response.xpath('//table[@id="rtp2"]/tbody')
        item = WangyiItem()

        item['sim_name'] = response.xpath('//h2[@id="name"]/text()').extract()[0]
        item['code'] = response.xpath('//b[@id="code"]/text()').extract()[0]

        for i in info:
            a = i.xpath('.//tr[1]/td[1]/text()').extract()[1]
            item['sy'] = a.split('：')[1]                                         #获得：后的信息
            item['pe'] = i.xpath('.//span[@id="gt6_2"]/text()').extract()[0]
            a = i.xpath('.//tr[2]/td[1]/text()').extract()[0]
            item['jzc'] = a.replace("：", "")                                     #去掉：
            item['sjl'] = i.xpath('.//span[@id="gt13_2"]/text()').extract()[0]
            a = i.xpath('.//tr[3]/td[1]/text()').extract()[0]
            item['ys'] = a.split('：')[1]
            a = i.xpath('.//tr[3]/td[2]/text()').extract()[0]
            item['ystb'] = a.replace("：", "")
            a = i.xpath('.//tr[4]/td[1]/text()').extract()[0]
            item['jlr'] = a.split('：')[1]
            a = i.xpath('.//tr[4]/td[2]/text()').extract()[0]
            item['jlrtb'] = a.split('：')[1]
            a = i.xpath('.//tr[5]/td[1]/text()').extract()[0]
            item['mll'] = a.split('：')[1]
            a = i.xpath('.//tr[5]/td[2]/text()').extract()[0]
            item['jll'] = a.split('：')[1]
            a = i.xpath('.//tr[6]/td[1]/text()').extract()[0]
            item['roe'] = a.split('：')[1]
            a = i.xpath('.//tr[6]/td[2]/text()').extract()[0]
            item['fzl'] = a.split('：')[1]
            a = i.xpath('.//tr[7]/td[1]/text()').extract()[0]
            item['zgb'] = a.split('：')[1]
            item['zz'] = i.xpath('.//span[@id="gt7_2"]/text()').extract()[0]
            a = i.xpath('.//tr[8]/td[1]/text()').extract()[0]
            item['ltg'] = a.split('：')[1]
            item['lz'] = i.xpath('.//span[@id="gt14_2"]/text()').extract()[0]
            a = i.xpath('.//tr[9]/td[1]/text()').extract()[0]
            item['wfplr'] = a.split('：')[1]
            a = i.xpath('.//tr[10]/td[1]/text()').extract()[0]
            item['date'] = a.split('：')[1]

        yield item