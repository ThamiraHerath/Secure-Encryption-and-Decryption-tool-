import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score


#loading the trainer data, a list of most common passwords

data = pd.read_csv ('Secure-Encryption-and-Decryption-tool-/Secure Encryption and Decrytption tool/10-million-password-list-top-10000.txt')

#splitting the dataset into featueres and tragets. 
x = data ['password']
y = data ['strength']

vectorizeer = TfidVectorizeer (analyzer = 'char',ngram_range = (1,3))
X_train, X_test, y_train, y_test = train_test_split(X_vectorized, y, test_size=0.2, random_state=42)

# Train RandomForestClassifier
clf = RandomForestClassifier(n_estimators=100, random_state=42)
clf.fit(X_train, y_train)

# Make predictions on test set
y_pred = clf.predict(X_test)

# Evaluate model performance
accuracy = accuracy_score(y_test, y_pred)
print("Accuracy:", accuracy)

# Save trained model
joblib.dump(clf, 'password_strength_model.pkl')
joblib.dump(vectorizer, 'password_vectorizer.pkl')
