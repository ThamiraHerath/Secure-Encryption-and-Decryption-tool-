import pandas as pd
from sklearn.feature_extraction.text import TfidfVectorizer
from sklearn.model_selection import train_test_split
from sklearn.ensemble import RandomForestClassifier
from sklearn.metrics import accuracy_score


#loading the trainer data, a list of most common passwords

data = pd.read_csv ('Secure-Encryption-and-Decryption-tool-/Secure Encryption and Decrytption tool/10-million-password-list-top-10000.txt')
