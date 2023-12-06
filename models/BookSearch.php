<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Book;

/**
 * BookSearch represents the model behind the search form of `app\models\Book`.
 */
class BookSearch extends Book
{
    public $author_name;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'author_id', 'year', 'pages'], 'integer'],
            [['caption'], 'safe'],
            [['author_name'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Book::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->joinWith(['author']);

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'author_id' => $this->author_id,
            'year' => $this->year,
            'pages' => $this->pages,
        ]);

        $query->andFilterWhere(['like', 'caption', $this->caption]);

        if (isset($this->author_name)) {
            if (mb_strpos($this->author_name, ' ') === false) {
                $query->orFilterWhere([
                    'or',
                    ['like', 'author.firstname', $this->author_name],
                    ['like', 'author.lastname', $this->author_name],
                ]);
            } else {
                $names = explode(' ', $this->author_name);
                foreach ($names as $name) {
                    $name = trim($name);
                    $query->orFilterWhere([
                        'or',
                        ['like', 'author.firstname', $name],
                        ['like', 'author.lastname', $name],
                    ]);
                }
            }
        }

        return $dataProvider;
    }
}
