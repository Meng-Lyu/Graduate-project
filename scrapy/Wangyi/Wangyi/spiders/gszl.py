# -*- coding: utf-8 -*-
import scrapy
import re
from Wangyi.items import WangyiItem


class GszlSpider(scrapy.Spider):
    name = 'gszl'
    allowed_domains = ['quotes.money.163.com']
    start_urls = ['http://quotes.money.163.com']
    custom_settings = {
    'ITEM_PIPELINES':{'Wangyi.pipelines.Pipelinegszl': 300}
    }

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
        info = response.xpath('//div[@class="col_l_01"]/table')
        item = WangyiItem()
        codeList = response.xpath('//div[@class="col_l_01"]/h1/span/text()').extract()
        for p in range(len(codeList)):
            item['code'] = re.findall(r'\d{6}',codeList[p])

        for i in info:
            try:                                                     #防止text为空
                item['form'] = i.xpath('.//tr[1]/td[2]/text()').extract()[0]
            except:
                item['form'] = '--'
            try:
                item['location'] = i.xpath('.//tr[1]/td[4]/text()').extract()[0]
            except:
                item['location'] = '--'
            try:
                item['sim_name'] = i.xpath('.//tr[2]/td[2]/text()').extract()[0]
            except:
                item['sim_name'] = '--'
            try:
                item['addr'] = i.xpath('.//tr[2]/td[4]/text()').extract()[0]
            except:
                item['addr'] = '--'
            try:
                item['all_name'] = i.xpath('.//tr[3]/td[2]/text()').extract()[0]
            except:
                item['all_name'] = '--'
            try:
                item['tel'] = i.xpath('.//tr[3]/td[4]/text()').extract()[0]
            except:
                item['tel'] = '--'
            try:
                item['en_name'] = i.xpath('.//tr[4]/td[2]/text()').extract()[0]
            except:
                item['en_name'] = '--'
            try:
                item['email'] = i.xpath('.//tr[4]/td[4]/text()').extract()[0]
            except:
                item['email'] = '--'
            try:
                item['fund'] = i.xpath('.//tr[5]/td[2]/text()').extract()[0]
            except:
                item['fund'] = '--'
            try:
                item['chairman'] = i.xpath('.//tr[5]/td[4]/text()').extract()[0]
            except:
                item['chairman'] = '--'
            try:
                item['emp_num'] = i.xpath('.//tr[6]/td[2]/text()').extract()[0]
            except:
                item['emp_num'] = '--'
            try:
                item['secretary'] = i.xpath('.//tr[6]/td[4]/text()').extract()[0]
            except:
                item['secretary'] = '--'
            try:
                item['represent'] = i.xpath('.//tr[7]/td[2]/text()').extract()[0]
            except:
                item['represent'] = '--'
            try:
                item['s_tele'] = i.xpath('.//tr[7]/td[4]/text()').extract()[0]
            except:
                item['s_tele'] = '--'
            try:
                item['manager'] = i.xpath('.//tr[8]/td[2]/text()').extract()[0]
            except:
                item['manager'] = '--'
            try:
                item['s_fax'] = i.xpath('.//tr[8]/td[4]/text()').extract()[0]
            except:
                item['s_fax'] = '--'
            try:
                item['web'] = i.xpath('.//tr[9]/td[2]/text()').extract()[0]
            except:
                item['web'] = '--'
            try:
                item['s_email'] = i.xpath('.//tr[9]/td[4]/text()').extract()[0]
            except:
                item['s_email'] = '--'
            try:
                item['inf_web'] = i.xpath('.//tr[10]/td[2]/text()').extract()[0]
            except:
                item['inf_web'] = '--'
            try:
                item['inf_news'] = i.xpath('.//tr[10]/td[4]/text()').extract()[0]
            except:
                item['inf_news'] = '--'
            try:                                                          #若title中有信息，爬取title中的信息，否则爬取text
                item['business'] = i.xpath('.//tr[11]/td[2]/@title').extract()[0]
            except:
                try:
                    item['business'] = i.xpath('.//tr[11]/td[2]/text()').extract()[0]
                except:
                    item['business'] = '--'
            try:
                item['field'] = i.xpath('.//tr[12]/td[2]/@title').extract()[0]
            except:
                try:
                    item['field'] = i.xpath('.//tr[12]/td[2]/text()').extract()[0]
                except:
                    item['field'] = '--'
            try:
                item['evolution'] = i.xpath('.//tr[13]/td[2]/@title').extract()[0]
            except:
                try:
                    item['evolution'] = i.xpath('.//tr[13]/td[2]/text()').extract()[0]
                except:
                    item['evolution'] = '--'

        yield item

