# -*- coding: utf-8 -*-

# Define your item pipelines here
#
# Don't forget to add your pipeline to the ITEM_PIPELINES setting
# See: https://doc.scrapy.org/en/latest/topics/item-pipeline.html

import  pymysql

class Pipelinegszl(object):
    
    def __init__(self):
        # 连接数据库
        self.connect = pymysql.connect(
            host='127.0.0.1',  # 数据库地址
            port=3306,  # 数据库端口
            db='wangyi',  # 数据库名
            user='root',  # 数据库用户名
            passwd='55151001',  # 数据库密码
            charset='utf8',  # 编码方式
            use_unicode=True)
        # 通过cursor执行增删查改
        self.cursor = self.connect.cursor()

    def process_item(self, item, spider):
        self.cursor.execute(
            """insert into gszl(code, name, form, location, sim_name, addr, all_name,tel, en_name, email, fund, chairman, emp_num, secretary, represent,
               s_tele, manager, s_fax,  web, s_email, inf_web, inf_news, business, field, evolution)
            value (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)""",  
            (item['code'], item['sim_name'], item['form'], item['location'], item['sim_name'], item['addr'],
             item['all_name'], item['tel'], item['en_name'], item['email'], item['fund'],
             item['chairman'], item['emp_num'], item['secretary'], item['represent'],
             item['s_tele'], item['manager'], item['s_fax'], item['web'], item['s_email'],
             item['inf_web'], item['inf_news'], item['business'], item['field'], item['evolution']))
        # 提交sql语句
        self.connect.commit()
        return item  # 必须实现返回



class Pipelinegdfx(object):
    
    def __init__(self):
        # 连接数据库
        self.connect = pymysql.connect(
            host='127.0.0.1',  # 数据库地址
            port=3306,  # 数据库端口
            db='wangyi',  # 数据库名
            user='root',  # 数据库用户名
            passwd='55151001',  # 数据库密码
            charset='utf8',  # 编码方式
            use_unicode=True)
        # 通过cursor执行增删查改
        self.cursor = self.connect.cursor()

    def process_item(self, item, spider):
        self.cursor.execute(
            """insert into gdfx(code, name, shareholder_1, perc_1, shareholder_2, perc_2, shareholder_3, perc_3, shareholder_4, shareholder_5, shareholder_6, shareholder_7, shareholder_8, shareholder_9, shareholder_10)
            value (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)""",  
            (item['code'], item['sim_name'], item['shareholder_1'], item['perc_1'], item['shareholder_2'], item['perc_2'],
             item['shareholder_3'], item['perc_3'], item['shareholder_4'], item['shareholder_5'], item['shareholder_6'],
             item['shareholder_7'], item['shareholder_8'], item['shareholder_9'], item['shareholder_10']))
        # 提交sql语句
        self.connect.commit()
        return item  # 必须实现返回



class Pipelineyggc(object):
    
    def __init__(self):
        # 连接数据库
        self.connect = pymysql.connect(
            host='127.0.0.1',  # 数据库地址
            port=3306,  # 数据库端口
            db='wangyi',  # 数据库名
            user='root',  # 数据库用户名
            passwd='55151001',  # 数据库密码
            charset='utf8',  # 编码方式
            use_unicode=True)
        # 通过cursor执行增删查改
        self.cursor = self.connect.cursor()

    def process_item(self, item, spider):
        self.cursor.execute(
            """insert into yggc(code, name, comp_1, perc_1, comp_2, perc_2, comp_3, perc_3, comp_4, perc_4, comp_5, perc_5)
            value (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)""",  
            (item['code'], item['sim_name'], item['comp_1'], item['perc_1'], item['comp_2'], item['perc_2'],
             item['comp_3'], item['perc_3'], item['comp_4'], item['perc_4'], item['comp_5'], item['perc_5']))
        # 提交sql语句
        self.connect.commit()
        return item  # 必须实现返回


class Pipelineprofit(object):

    def __init__(self):
        # 连接数据库
        self.connect = pymysql.connect(
            host='127.0.0.1',  # 数据库地址
            port=3306,  # 数据库端口
            db='wangyi',  # 数据库名
            user='root',  # 数据库用户名
            passwd='55151001',  # 数据库密码
            charset='utf8',  # 编码方式
            use_unicode=True)
        # 通过cursor执行增删查改
        self.cursor = self.connect.cursor()

    def process_item(self, item, spider):
        self.cursor.execute(
            """insert into profit(code,name,sy,pe,jzc,sjl,ys,ystb,jlr,jlrtb,mll,jll,roe,fzl,zgb,zz,ltg,lz,wfplr,date)
            value (%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s)""",
            (item['code'], item['sim_name'], item['sy'], item['pe'], item['jzc'], item['sjl'],
             item['ys'], item['ystb'], item['jlr'], item['jlrtb'], item['mll'], item['jll'],
             item['roe'], item['fzl'], item['zgb'], item['zz'], item['ltg'], item['lz'], item['wfplr'], item['date']))
        # 提交sql语句
        self.connect.commit()
        return item  # 必须实现返回