# -*- coding: utf-8 -*-
import scrapy
import re
from Wangyi.items import WangyiItem


class YggcSpider(scrapy.Spider):
    name = 'yggc'
    allowed_domains = ['quotes.money.163.com']
    start_urls = ['http://quotes.money.163.com/']
    custom_settings = {
    'ITEM_PIPELINES':{'Wangyi.pipelines.Pipelineyggc': 300}
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
        infoDict = {}
        sortList = []
        sortList2 = []
                
        item = WangyiItem()

        infoList = response.xpath('//div[@class="area"]/div[@class="header"]/div[@class="stock_info"]/table')
        for p in range(len(infoList)):
            item['sim_name'] = infoList.xpath('.//tr/td//h1/a/text()').extract()
            item['code'] = infoList.xpath('.//tr/td//h1/span/a/text()').extract()
        
        info = response.xpath('//div[11]/div[@style="display:"]/table')

        for i in info:
            item['comp_1'] = i.xpath('.//tr/td[@class="align_l"]/text()').extract()[0]
            item['comp_2'] = i.xpath('.//tr/td[@class="align_l"]/text()').extract()[1]
            item['comp_3'] = i.xpath('.//tr/td[@class="align_l"]/text()').extract()[2]
            item['comp_4'] = i.xpath('.//tr/td[@class="align_l"]/text()').extract()[3]
            item['comp_5'] = i.xpath('.//tr/td[@class="align_l"]/text()').extract()[4]
            item['perc_1'] = i.xpath('.//tr/td/text()').extract()[2]
            item['perc_2'] = i.xpath('.//tr/td/text()').extract()[5]
            item['perc_3'] = i.xpath('.//tr/td/text()').extract()[8]
            item['perc_4'] = i.xpath('.//tr/td/text()').extract()[11]
            item['perc_5'] = i.xpath('.//tr/td/text()').extract()[14]

        infoDict[item['comp_1']] = float(re.sub('%', "", str(item['perc_1'])))                                  #将比例去除%后转化为浮点型，方便进行比较，并将每个员工构成以及相应的比例分别按照字典的key和value存入infoDict字典中
        infoDict[item['comp_2']] = float(re.sub('%', "", str(item['perc_2'])))
        infoDict[item['comp_3']] = float(re.sub('%', "", str(item['perc_3'])))
        infoDict[item['comp_4']] = float(re.sub('%', "", str(item['perc_4'])))
        infoDict[item['comp_5']] = float(re.sub('%', "", str(item['perc_5'])))

        sortList = sorted(infoDict.items(), key =lambda x:x[1], reverse=True)                                   #运用lambda表达式对字典按照value排序，并输出('"本科人数", 60.02')形式的列表
        
        item['perc_1'] = re.findall(r'[\d.]+', str(sortList[0]))[0] + '%'                                       #提取排序后的比例并加上%
        item['perc_2'] = re.findall(r'[\d.]+', str(sortList[1]))[0] + '%'
        item['perc_3'] = re.findall(r'[\d.]+', str(sortList[2]))[0] + '%'
        item['perc_4'] = re.findall(r'[\d.]+', str(sortList[3]))[0] + '%'
        item['perc_5'] = re.findall(r'[\d.]+', str(sortList[4]))[0] + '%'

        for n in range(len(sortList)):                                                           
            sortList2.append(re.sub(r'[\u4eba\u6570]',"", str(re.findall(r'[\u4e00-\u9fa5]+', str(sortList[n])))))        #提取排序后的员工构成并去掉“人数”（unicode编码为\u4eba\u6570）并存入sortList2列表中

        sortList = sortList2
        
        item['comp_1'] = re.findall(r'[\u4e00-\u9fa5]+', str(sortList[0]))                                      #对sortList再次进行提取，去掉多余的符号
        item['comp_2'] = re.findall(r'[\u4e00-\u9fa5]+', str(sortList[1]))
        item['comp_3'] = re.findall(r'[\u4e00-\u9fa5]+', str(sortList[2]))
        item['comp_4'] = re.findall(r'[\u4e00-\u9fa5]+', str(sortList[3]))
        item['comp_5'] = re.findall(r'[\u4e00-\u9fa5]+', str(sortList[4]))
        
        yield item

