```mermaid　
erDiagram
  users ||--|{ works : "1人のユーザーは1以上のワークを持つ"
  users ||--o{ achievements: "1人のユーザーは0以上の達成記録を持つ"
  works ||--o{ achievements: "1つのワークは0以上の達成記録を持つ"
  users {
    bigint id PK "ユーザーID"
    string name "ユーザー名"
    timestamp created_at "作成日時"
    timestamp updated_at "更新日時"
  }

  works {
    bigint id PK
    references user FK
    string title "ワークタイトル"
    text content "ワーク内容"
    string frequency_unit "日、週、月、年"
    string frequency_num "回数"
    timestamp created_at "作成日時"
    timestamp updated_at "更新日時"
  }

  achievements {
    bigint id PK
    references work FK
    references user FK
    timestamp created_at "作成日時"
    timestamp updated_at "更新日時"
  }
  ```