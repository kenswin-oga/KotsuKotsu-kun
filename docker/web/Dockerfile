# ベースイメージの指定
# FROM <イメージ>:<タグ>
FROM nginx:stable-alpine

# 作成した設定ファイルをnginxコンテナの設定ファイルにコピー
# COPY <コピー元> <コピー先>
COPY ./web/default.conf /etc/nginx/conf.d/default.conf
