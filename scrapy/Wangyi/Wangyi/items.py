# -*- coding: utf-8 -*-

# Define here the models for your scraped items
#
# See documentation in:
# https://doc.scrapy.org/en/latest/topics/items.html

import scrapy


class WangyiItem(scrapy.Item):
    # define the fields for your item here like:
#gszl
    code = scrapy.Field()
    form = scrapy.Field() #组织形式
    location = scrapy.Field()
    sim_name = scrapy.Field()
    addr = scrapy.Field()
    all_name = scrapy.Field()
    tel = scrapy.Field()
    en_name = scrapy.Field()
    email = scrapy.Field()
    fund = scrapy.Field()
    chairman = scrapy.Field()
    emp_num = scrapy.Field()
    secretary = scrapy.Field()
    represent = scrapy.Field()
    s_tele = scrapy.Field()
    manager = scrapy.Field()
    s_fax = scrapy.Field()
    web = scrapy.Field()
    s_email = scrapy.Field()
    inf_web = scrapy.Field()
    inf_news = scrapy.Field()
    business = scrapy.Field()
    field = scrapy.Field()
    evolution = scrapy.Field()

#gdfx
    shareholder_1 = scrapy.Field()
    perc_1 = scrapy.Field()
    shareholder_2 = scrapy.Field()
    perc_2 = scrapy.Field()
    shareholder_3 = scrapy.Field()
    perc_3 = scrapy.Field()
    shareholder_4 = scrapy.Field()
    shareholder_5 = scrapy.Field()
    shareholder_6 = scrapy.Field()
    shareholder_7 = scrapy.Field()
    shareholder_8 = scrapy.Field()
    shareholder_9 = scrapy.Field()
    shareholder_10 = scrapy.Field()

#yggc
    comp_1 = scrapy.Field() 
    comp_2 = scrapy.Field()
    comp_3 = scrapy.Field()
    comp_4 = scrapy.Field()
    perc_4 = scrapy.Field()
    comp_5 = scrapy.Field()
    perc_5 = scrapy.Field()

#profit
    sy = scrapy.Field()
    pe = scrapy.Field()
    jzc = scrapy.Field()
    sjl = scrapy.Field()
    ys = scrapy.Field()
    ystb = scrapy.Field()
    jlr = scrapy.Field()
    jlrtb = scrapy.Field()
    mll = scrapy.Field()
    jll = scrapy.Field()
    roe = scrapy.Field()
    fzl = scrapy.Field()
    zgb = scrapy.Field()
    zz = scrapy.Field()
    ltg = scrapy.Field()
    lz = scrapy.Field()
    wfplr = scrapy.Field()
    date = scrapy.Field()
