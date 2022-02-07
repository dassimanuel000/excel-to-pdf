import pandas
import json

excel_data_df = pandas.read_excel('init.xlsx')

json_str = excel_data_df.to_json()

print(json_str)

for j in json_str:
    print(j)

#with open('res.json', 'w') as f:
#    json.dump(json_str, f)

#with open("res.json", "wb") as writeJSON:
#   jsStr = json.dumps(json_str)
#   # the decode() needed because we need to convert it to binary
#   writeJSON.write(jsStr.decode('utf-8')) 
print ('end')
